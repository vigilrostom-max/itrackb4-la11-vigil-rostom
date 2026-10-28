# LA9 - Your Own Table, Your Own Model


Name: Rostom P. Vigil
Course: ITRACKB4 - Web Systems and Technologies: Web Programming 2
My products table holds sari-sari store items with six columns: name, price,
stock, category, is_available and brand. My pages now read from this table
through the Product model instead of storage/products.json.

## F1. Which column did you make nullable, and why that one and not another?
I made `brand` nullable. Some of my products, like Fresh Egg, Ensaymada and
Spanish Bread from the local bakery, have no brand at all, so an empty brand is
true information, not missing data. Every product must still have a name,
price, stock, category and availability, so none of those can be empty.

## F2. Which step failed first for you, and what did the error say?
The first failure was in Part B, when I ran Product::create() in Tinker before
adding $fillable. It threw a MassAssignmentException saying "Add [name] to
fillable property to allow mass assignment on [App\Models\Product]." After I
listed all six columns in $fillable and restarted Tinker, the same line
created the product.

## F3. You changed no Blade file in Part D, yet your pages still work. Why not?
My controller still sends the same variable names to the same views: $products
to products.index, and $product and $heading to products.show. My table columns
use the same names as the old JSON keys (id, name, price, stock, category), and
a Product model can be read with $product['name'] just like an array. So
index.blade.php and show.blade.php cannot tell that the data now comes from the
database.