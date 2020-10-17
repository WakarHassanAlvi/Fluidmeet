<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isEmpty;

class CompanyController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Company::class);
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);//The thing is paginate() is kind of doing get() for you. And all() does it too.
        return view('admin.company.index', [
            'companies'=>$companies
            ]);
    }

    public function search()
    {
        if(request()->filled('search_company'))
        {
            $name = request('search_company');
            $companies = Company::where('name', 'LIKE', "%$name%")->paginate(10);
        
            return view('home', ['companies'=>$companies]);
        }
        else
        {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Company::class);
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Company::class);

        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email:rfc,dns',
            'contact' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            'num_employees' => 'required',
            'company_type' => 'required|in:private,public',
            'service' => 'required'
        ]);


        if($request->image)
        {
            $validatedData['image'] = $request->image->store('images'); //we did change the default file system driver to public in .env
            //we added a symbolic link which created a link to storage folder in public folder
        }

        //dd($validatedData);

        $user = Auth::user();
        $user->companies()->create($validatedData);

        session()->flash('create_success', 'Company with Name: '.$validatedData['name'].' was created.');//another way of doing this by using helper function

        return redirect()->route('companies.index');
        //dd($validatedData);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('company-details', ['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $this->authorize('view', $company);//company policy that we made.
        $services = $company->service;
        return view('admin.company.edit', ['company' => $company, 'services'=>$services]);
        /*foreach($company->service as $service)
        {
            echo $service."<br>";
        }*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'required|email:rfc,dns',
            'contact' => 'required|regex:/[0-9]/',
            'address' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000',
            'num_employees' => 'required',
            'company_type' => 'required|in:private,public',
            'service' => 'required'
        ]);

        if($request->image)
        {
            //request()->validate(['image'=>'mimes:jpeg,jpg,png,gif|required|max:10000']);
            $validatedData['image'] = $request->image->store('images');
        }
        
        $this->authorize('update', $company);//company policy that we made.

        
        $company->update($validatedData);
        session()->flash('update_success', 'Company with Name: '.$validatedData['name'].' was updated.');//another way of doing this by using helper function
        

        
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company, Request $request)
    {
        $this->authorize('delete', $company);
        $company->delete();

        //Session::flash('delete_success', 'Post was Deleted.');//thats one way of doing this

        $request->session()->flash('delete_success', 'Company '.$company->name.' was Deleted.');//another way of doing this by injecting request

        return back();
    }
}
