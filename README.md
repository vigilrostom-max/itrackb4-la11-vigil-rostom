# LA10 - Your Own Lookup Table

Name: Rostom P. Vigil
Course: ITRACKB4 - Web Systems and Technologies: Web Programming 2
My sari-sari store products now have a lookup table called categories. Each product
keeps a category_id that points to its category, instead of repeating the category text.

## G1. Which column did you turn into a table, and why that one and not another?
I turned `category` into a table. It comes from a fixed list (Drinks, Pantry, Canned and
Bakery), the same values repeat across my eight products (Coke and Kopiko are both
Drinks), and a category could later need details of its own, like a description. My other
columns do not qualify: price and stock are numbers, is_available is true or false, and
name and brand are free text that is different for almost every product.

## G2. What number did screenshot 6 show, and why exactly that number?
Screenshot 6 showed 9 queries. My list page shows 8 products, so Laravel ran 1 query to
fetch all the products, plus 1 more query for each product to fetch its category, because
`$product->category->name` is read inside the loop. That is 1 + 8 = 9. After I added
`with('category')` it dropped to 2.

## G3. Your belongsTo method is named in the singular. What would break if you made it plural?
If I named it `categories()` instead of `category()`, Eloquent would look for a column
called `categories_id` in my products table, but my column is `category_id`. It would not
find it, so every product's category would come back as null and my list page would crash
with the error "Attempt to read property name on null".