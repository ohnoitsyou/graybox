# graybox

A Redbox clone for IS 448

Project Members: 

* Rashid Azima
* Andrew Johnson
* Johnathan Ko
* Christian Nieva
* David Young


## Project proposal
### Technologies:
Forms for taking customer information.
CSS for a global look-and-feel
PHP for dynamic product listings
MySql for storing customer information and product information
AJAX for making single page call’s back to the application
javascript for reacting to user events

### Use Cases:
1. Register new account
   a. Customer registers into the system.
   b. Customer checks for username availability.
   c. New member promotion for 20% off new releases
   d. Suggests username(s).
2. Display new releases
   a. The GrayBox rental system pulls all new releases of the week.
   b. Suggests 20% off that item for 2 weeks.
3. Set user preferences
   a. User logs into system
   b. User selects genres they would like featured
   c. User is presented with movies matching preferences at home screen
4. Rent movie
a. Customer signs into the GrayBox device.
   b. Customer searches for and adds up to two movies in their car.
   c. Customer clicks “Checkout” to begin the checkout process.
   d. GrayBox informs customer that their card will be charged.
   e. Customer confirms rental purchase.
   f. GrayBox machine processes a temporary charge to the credit card, for collateral, and to ensure the card is valid.
   g. GrayBox updates its database to reflect the movies rented.
   h. GrayBox dispenses the customers rentals.
5. Return movie
   a. User is prompted to select rent or return, they select return.
   b. User’s credit card is charged the appropriate amount.
