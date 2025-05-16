<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\productmodel;
use App\Models\productoutmodel;
use App\Models\categorymodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\session;
use Illuminate\Pagination\LengthAwarePaginator;

class usercontroller extends Controller
{
    public function signup(Request $request){
        $data=$request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5',
        ]);
        $user=User::create($data);
        Auth::login($user);
        return redirect()->route('/home');
    }
    public function signin(Request $request){
         $data=$request->validate([
              'name'=>'required',
              'password'=>'required',
        ]);

        if (Auth::attempt($data)) {
          $request->session()->regenerate();
          return redirect()->route('/home');
        } else {
            return back();
        }
    }
    public function logout(Request $request){
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();

      return redirect()->route('/home');
    }
    //home
  public function home(){
    $products = productmodel::with('category')->get();
    $productouts = productoutmodel::with('product.category')->get(); // add relations

    $totalProductsIn = $products->count();
    $totalQuantityIn = $products->sum('quantity');
    $totalProductsOut = $productouts->count();
    $totalQuantityOut = $productouts->sum('quantity');

    return view('home', compact(
        'products', 
        'productouts', 
        'totalProductsIn', 
        'totalQuantityIn', 
        'totalProductsOut', 
        'totalQuantityOut'
    ));
}


public function product(Request $request)
{
    $query = productmodel::with('category');

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->paginate(10); // ✅ paginate directly on query builder

    return view('product', compact('products'));
}

   public function create(Request $request){
       $data=$request->validate([
            'name'=>'required',
            'quantity'=>'required|numeric',
            'price'=>'required|integer',
            'category_id'=>'required|numeric',
        ]);
        $newproduct= productmodel::create($data);
        return redirect()->route('product');
    }
    public function showcreate(){
        $categories = categorymodel::all();
        return view('create', compact('categories'));

    }
    
    
    public function edit(productmodel $product ){
        // dd($product);
        return view('edit',compact('product'));
    }
    public function update(Request $request,productmodel $product){
        $data=$request->validate([
            'name'=>'required',
        'quantity'=>'required',
        'price'=>'required',
    ]);
    $product->update($data);
    return redirect()->route('product');

}

    public function destroy(productmodel $product){
        $product->delete();
        return redirect()->route('product');
    }

    public function category(){
        $categories=categorymodel::all();
        return view('category', compact('categories'));
    }

  public function addcat(Request $request){
    $category=$request->validate([
        'category_name'=>'required',
    ]);
    $new=categorymodel::create($category);
    return redirect()->route('category')->with('success','category added successfully');

  }
  public function editcat(categorymodel $category)
{
    return view('editcat', compact('category'));
}

  public function updatecat(Request $request,categorymodel $category){
    $data=$request->validate([
        'category_name'=>'required',
    ]);
    $category->update($data);
    return redirect()->route('category')->with('success','category updatted successfuly');
  }
  public function deletecat(categorymodel $category){
    $category->delete();
    return redirect()->route('category')->with('success','category deleted successfuly');
  }
   
  public function dash(){
      $categories=categorymodel::all();
      $products=productmodel::all();
      $productouts=productoutmodel::all(); 
      return view('dash',compact('categories','products','productouts'));
    }
//   public function home(){
//       $categories=categorymodel::all();
//       $products=productmodel::all();
//       $productouts=productoutmodel::all(); 
//       return view('/',compact('categories','products','productouts'));
//     }
    
    //report
    public function report(){
        $products=productmodel::all();
        $productouts=productoutmodel::all();
        return view('report',compact('products','productouts'));
    }
    // productout table
   public function productout(){
        $products=productmodel::all();
        $categories=categorymodel::all();
        $productouts=productoutmodel::all();
        return view('productout',compact('productouts','products','categories'));
   }
   public function showaddout(){
          $products=productmodel::all();
        $categories=categorymodel::all();
        $productouts=productoutmodel::all();
        return view('productout',compact('productouts','products','categories'));
   }

   public function addout(Request $request){
    $data = $request->validate([
        'product_id' => 'required|exists:product,id',
        'quantity' => 'required|integer|min:1',
        'date' => 'required|date',
    ]);

 $product = productmodel::find($request->product_id);

     if ($request->quantity > $product->quantity) {
        return redirect()->route('productout')->with('error', 'Not enough stock');
    }

    productoutmodel::create($data);

    $product->quantity -= $request->quantity;
    $product->save();

    return redirect()->route('productout')->with('success','Product out recorded');
}
 public function editout(productoutmodel $productout){
    return view('editout',compact('productout'));
}
public function updateout(Request $request,productoutmodel $productout){
        $data = $request->validate([
        'quantity' => 'required|',
        'date' => 'required|date',
    ]);
        $productout->update($data);
    return redirect()->route('productout');
}
public function deleteout(productoutmodel $productout){
    $productout->delete();
    return redirect()->route('productout');
}
  }
 
    //

