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
* Forms for taking customer information.
* CSS for a global look-and-feel
* PHP for dynamic product listings
* MySql for storing customer information and product information
* AJAX for making single page call’s back to the application
* JavaScript for reacting to user events

### Use Cases:

1. Register new account
   * Customer registers into the system.
   * Customer checks for username availability.
   * New member promotion for 20% off new releases
   * Suggests username(s).

2. Display new releases
   * The GrayBox rental system pulls all new releases of the week.
   * Suggests 20% off that item for 2 weeks.

3. Set user preferences
   * User logs into system
   * User selects genres they would like featured
   * User is presented with movies matching preferences at home screen

4. Rent movie
   * Customer signs into the GrayBox device.
   * Customer searches for and adds up to two movies in their car.
   * Customer clicks “Checkout” to begin the checkout process.
   * GrayBox informs customer that their card will be charged.
   * Customer confirms rental purchase.
   * GrayBox machine processes a temporary charge to the credit card, for collateral, and to ensure the card is valid.
   * GrayBox updates its database to reflect the movies rented.
   * GrayBox dispenses the customers rentals.

5. Return movie
   * User is prompted to select rent or return, they select return.
   * User’s credit card is charged the appropriate amount.
