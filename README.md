# LA7 - Let Them Add Something

Name: Rostom P. Vigil
Course: ITRACKB4 - Web Systems and Technologies: Web Programming 2
My form adds a product with a name, price, stock, and category.
Products are saved in storage/products.json.

## Q1. Why does the form use POST instead of GET?

GET puts the form values into the URL, like /products? name=Pancit+Canton&price=18 . They show in the address bar and in history. GET is meant for reading. A browser repeats a GET freely on refresh, with no warning. If saving happened on a GET, every refresh would save another copy. A browser knows POST sends data. It warns before repeating one, and your redirect means a refresh only repeats the harmless GET of the list. In your own project, a GET form would go to GET /products , which is index , so store() would never even run. The values would just become a query string, like your filters.

## Q2. What stops the save when validation fails, and where does the visitor end up?

$request->validate([...]) stops the method by itself when a rule fails. It throws a validation exception, so the lines after it never run: no getProducts , no saveProducts , no redirect to the list. Laravel catches that and sends the visitor back to where they came from: /products/create . It also puts the error messages and what they typed into the session for one page load. That's what @error and old() read. You checked this in test 4: the JSON still had 8 products.

## Q3. The layout renders on every page. Why doesn't the success message appear on every page?

The layout DOES check on every page: @if (session('success')) runs everywhere. But ->with('success', ...) is "flash" data. It stays in the session for the next page load only, then Laravel deletes it. The redirect's page (the list) is that one page load, so the message shows there. On any refresh or next page, the session is empty, so the @if is false and nothing shows. Both are true at once: the check is everywhere, but the message only exists for one request.
