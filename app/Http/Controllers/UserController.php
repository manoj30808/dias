<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepo;
use App\Repositories\RoleRepo;
use Illuminate\Support\Facades\Validator;
use View;

class UserController extends Controller
{
	private $view_path;
    protected $UserRepo;
    protected $RoleRepo;

    public function __construct(UserRepo $UserRepo,RoleRepo $RoleRepo)
    {
    	$this->middleware('auth');
        $this->UserRepo = $UserRepo;
        $this->RoleRepo = $RoleRepo;

        $this->view_path = 'users.user';
        View::share('title', 'Users');
        View::share('module_name', 'Users');
    }

    // Method : index
	// Param : request
    // Output : return index view
    public function index(Request $request)
    {
    	$param['filter'] = $request->input("filter", array());
        $param['sort'] = $request->input("sort", array());
        $param['paginate'] = TRUE;
        if($request->input('filter.name.value')){
            $param['filter']['name']['value'] = '%'.$request->input('filter.name.value').'%';
        }

        $items = $this->UserRepo->getBy($param);

        //serial number
        $srno = ($request->input('page', 1) - 1) * config("setup.par_page", 10)  + 1;

        $compact = compact('items','srno');

        return view($this->view_path . '.index',$compact);
    }

    public function create()
    {
        $roles = $this->RoleRepo->lists('name','id');
        $compact = compact('roles');
        return view($this->view_path . '.create',$compact);
    }

    public function store(Request $request)
    {
        $inputs = $request->except('_token');
        $data   = array_except($inputs, 'save', 'save_exit','password_confirmation');

        $rules = [
            'name' => 'required|alpha|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ];
        // Create a new validator instance from our validation rules
        $validator = Validator::make($inputs, $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return redirect('user/create')
                ->withErrors($validator)
                ->withInput();
        }

        if($user = $this->UserRepo->create($data)){
      		return redirect('user')
                ->with('success', 'Record added sucessfully');
        }

        return redirect('user/')->with('error', 'Can not be created');
    }

    public function edit($id)
    {
    	$item = $this->UserRepo->find($id);
    	$selected_roles = $this->UserRepo->currentUserRole($id);
        $item = $item->toArray();
        $item['role_id'] = $selected_roles;
        $roles = $this->RoleRepo->lists('name','id');

        //unset($item['password']);

		$compact = compact('item','roles');
    	return view($this->view_path . '.update',$compact);
    }

    public function update(Request $request,$id)
    {
    	$inputs = $request->except('_token','_method','password_confirmation');
        $data   = array_except($inputs,array('save','save_exit'));

         $rules = [
            'name' => 'required|string|alpha|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ];
        if(!$request->input('password')){
        	unset($rules['password']);
        }
        $rules['email']="required|email|max:255|unique:users,email,".$id;

        // Create a new validator instance from our validation rules
        $validator = Validator::make($inputs, $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return redirect('user/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }

        if($this->UserRepo->update($data,$id)){
    		return redirect('user')
            ->with('success', 'Record updated sucessfully');
        }

        return redirect('user/')->with('error', 'Can not be created');
    }

    public function destroy(Request $request,$id)
    {
    	return redirect('user')->with('error', 'You can not delete any user');
    }
}
