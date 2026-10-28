# LA11 - Finish Your Own CRUD

Name: Rostom P. Vigil
Course: ITRACKB4 - Web Systems and Technologies: Web Programming 2
My sari-sari store products now have all seven resource actions. I can add, view, edit and
delete a product, and every product still shows its category name.

## G1. Route model binding: the two things that must be true
Two things must be true: the parameter in my ProductController method is type-hinted with the
Product model, and its name is exactly $product, the same word as the {product} segment in
/products/{product}. If I type-hint Product but name the variable something else like $item,
Laravel gives me an empty, unsaved Product instead of the real one, so my pages show blank
values or break and nothing says why. If the name is $product but I leave out the type-hint,
$product is only the id number from the URL, so $product->name fails.

## G2. Why my Delete link did not delete
A link can only send a GET request. In my project the address /products/{id} is shared by
show (GET), update (PUT) and destroy (DELETE), and Laravel picks the route by the address and
the verb together. My link had the right address but the wrong verb, so it never reached
destroy() and nothing was deleted; it just opened the Product Details page for the same
product. Only a form with @method('DELETE') makes Laravel see a DELETE request.

## G3. The second argument of old() on my edit form
The second argument is the fallback: old('name', $product->name) shows what I just typed if the
form was rejected, and the product's saved value otherwise. If I left it out and wrote only
old('name'), my edit form would open blank, like my screenshot 3, because nothing was typed yet.
If I used only the second part, {{ $product->name }}, the form would open filled, but after a
rejected submit my typed values (like the Stock I changed to 77) would be thrown away and the
original saved values would come back.