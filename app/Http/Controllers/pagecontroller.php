<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Category;
use App\Product;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class pagecontroller extends Controller
{


    //
//     public  function store(Request $request){
        
//       $input['select'] = 12;
        
//     }
// }
    public function index(){
        $cats = DB::table('categories') ->get();
        return view('Webpages.index',compact('cats'));
    }





public function sort( Request $request,$id){
    $input = $request -> all();

        /*Display products by view  */
        /*switch on request which has values 12 , 24 , 48 and 96 */
    switch(@$input['select']){
        case 12 :
            $value = 12 ;
            break;
        case 24 :
            $value = 24 ;
            break;
        case 48 :
            $value = 48;
            break;
        case 96 :
            $value = 96 ;
            break;
        default :
            $value = 12;
    }
    if(isset($input['min'])){
    $minPrice = @$input['min'] ; 
    $maxPrice = @$input['max'] ;
    }else{
        $minPrice = 1 ; 
        $maxPrice =100 ;
    }

    if(isset($input['color'])){
        $color= $input['color'];
     }else{
         $color = 'silver';
     }
   
               /*Display products by view  and sort by */
        /*switch on request which has values date ,newest and popular */
            
        switch (@$input['sortSelect']){
                case 'Date' :
                    $SortedValue = 'Date';
                    $product = Product::where('category_id',$id)->where('price','>=',$minPrice)->where('price','<=',$maxPrice)->where('color',$color)->orderBy('id','asc')->paginate(@$value);
                    return view('Webpages.shop',['id'=>Category::findOrFail($id),'products'=>@$product , 'SortedValue'=>@$SortedValue,'value'=>@$value,'minPrice'=>$minPrice,'maxPrice'=>$maxPrice,'color'=>$color]);
                    break;
                case 'Newest' :
                    $SortedValue = 'Newest';
                    $product = Product::where('category_id',$id)->where('price','>=',$minPrice)->where('price','<=',$maxPrice)->where('color',$color)->orderBy('id','desc')->paginate(@$value);
                    return view('Webpages.shop',['id'=>Category::findOrFail($id),'products'=>@$product , 'SortedValue'=>@$SortedValue,'value'=>@$value,'minPrice'=>$minPrice,'maxPrice'=>$maxPrice,'color'=>$color]);
                    break;
                case 'Popular' :
                    $SortedValue = 'Popular';
                    $product = Product::where('category_id',$id)->where('price','>=',$minPrice)->where('price','<=',$maxPrice)->where('color',$color)->orderBy('rating','desc')->paginate(@$value);
                    return view('Webpages.shop',['id'=>Category::findOrFail($id),'products'=>@$product , 'SortedValue'=>@$SortedValue,'value'=>@$value,'minPrice'=>$minPrice,'maxPrice'=>$maxPrice,'color'=>$color]);
                    break; 
                default:
                    $product = Product::where('category_id',$id)->where('price','>=',1)->where('price','<=',100)->orderBy('id','asc')->paginate(12);
                    return view('Webpages.shop',['id'=>Category::findOrFail($id),'products'=>@$product , 'SortedValue'=>'Date','value'=>12 ,'minPrice'=>$minPrice,'maxPrice'=>$maxPrice]);
               
        }
    

  
               
}




   

    public function checkout(){
        return view('Webpages.checkout');
    }

    public function product($id){
        $comments = Comment::where( 'product_id',$id )->paginate(3);
        $product = Product::findOrFail($id);
        return view('Webpages.product-details',compact('id' ,'product' , 'comments'));
    }

  

    //Fuinction For Search Button 

    
    public function mysearch(Request $request){
            $q=$request->get('q');
            $productName = DB::table('products')->where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();
        if(count($productName) > 0)
            {
                return view('Webpages.search')->with('productName',$productName)->withQuery($q);
             }
        else 
             {
                return view ('Webpages.search')->withMessage('No Details found. Try to search again !');
            
            }
        
        }


        //Function for Rating Start System
    public function RateFun(Request $request){
        if(\Auth::check()){
        $product = Product::find($request->id);
        $product ->rating = $request ->rate;
        $product -> save();
        $rating = new \willvincent\Rateable\Rating;

        $rating->rating = $request->rate;

        $rating->user_id = auth()->user()->id;

        $product->ratings()->save($rating);
        
        return redirect()->route("product",$request->id);
        }else{
            return redirect("login");

        }
    }

    public function thisweek(){
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);
        $pro=Product::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
         return view('Webpages.thisweek' , compact('pro'));
    }

 
}
