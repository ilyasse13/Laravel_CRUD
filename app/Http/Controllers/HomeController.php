<?php
 
namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Produit;
use App\Models\Type;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $produits=Produit::all();
        return view('home',['produits'=>$produits]);
    }
    public function create(){
       $types= Type::all();
        return view('create', ['types'=>$types]);
    }
    public function store(Request $request)
    {
        

    
        if($request->has('img')){

            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/imagages/';
            $file->move($path, $filename);
        }
        // Create a new product instance with image reference
        Produit::create([
            'RefPdt' => $request->RefPdt,
            'LibPdt' => $request->LibPdt,
            'prix' => $request->prix,
            'Qte' => $request->Qte,
            'description' => $request->description,
            'id_type' => $request->type,
            'image' => $path.$filename, // Save filename in the 'image' column
        ]);
    
        // Handle post-product-creation tasks (optional)
        // - Send image processing requests
        // - Update image URLs/paths after processing
        // - Clear temporary storage
    
        return redirect(route('home'));
    }
    public function show($RefPdt){
        $leproduit = Produit::where('RefPdt', $RefPdt)->first();
        return view('show',['produit'=>$leproduit]);
    }
    public function edit($RefPdt)
    {
        $types=Type::all();
        $leproduit = Produit::where('RefPdt', $RefPdt)->first();
        return view('edit', ['leproduit' => $leproduit,'types'=>$types]); 
    }
    public function update( $RefPdt)
{
    // Validate the incoming request data
   

    // Find the product by its reference
    $produit = Produit::where('RefPdt', $RefPdt)->first();

    $RefPdt=request()->RefPdt;
    $LibPdt=request()->LibPdt;
    $prix=request()->prix;
    $Quantité=request()->Qte;
    $typeId=request()->typeId;
    $description=request()->description;
    // Update the product with the new data
    Produit::where('RefPdt', $RefPdt)->update([
        'RefPdt' => $RefPdt,
        'LibPdt' => $LibPdt,
        'prix' =>$prix,
        'Qte' => $Quantité,
        'description' =>$description,
        'id_type' => $typeId,
    ]);

    // Redirect back to the product listing page with a success message
    return redirect()->route('home')->with('success', 'Product updated successfully.');
}
    public function destroy($RefPdt){

        $produit = Produit::findOrFail($RefPdt);

        // Get the image path
        $imagePath = public_path($produit->image);
    
        // Check if the file exists
        if (File::exists($imagePath)) {
            // Delete the file
            File::delete($imagePath);
        }
    
        // Delete the record from the database
        $produit->delete();
 
         return to_route(route:'home');
    }
}