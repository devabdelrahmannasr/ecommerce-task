# Technical Documentation for E-Commerce Application

## 1. Introduction
The E-Commerce application is a comprehensive platform designed to facilitate online shopping, offering a range of features including product browsing, cart management, order placement, and user authentication.

## 2. System Architecture
The application follows a clear three-tier architecture:
- Presentation (Front-end):  Multi page application.
- Application Logic (Back-end): Contains the core logic, business rules, and interactions with the database, Controlling Presentation.
- Data Storage (Database): MySQL database storing user information, product details, multi-level categories, and order records.

## 3. Design Patterns
- **Repository Pattern**: Repositories (e.g., `CategoryRepository`, `ProductRepository`) abstract database operations from controllers, enhancing code modularity.
- **Service Layer**: The `OrderService` encapsulates complex business logic related to order creation, separating it from controllers.
- **Resource Collections**: Laravel's Resource Collections transform API responses into consistent and structured data for clients.

## 4. Database Structure
The MySQL database consists of the following tables:
- `users`: Stores user authentication and profile information.
- `categories`: Contains product categories.
- `products`: Stores product details.
- `orders`: Records order information.
- `order_product`: Establishes a many-to-many relationship between orders and products.

## 5. Features and Functionality
- **User Authentication**: Provides login, and logout functionalities.
- **Product Management**: Admins can manage products and categories, including creation and deletion.
- **Product Listing**: Displaying products by cqtegory.
- **Shopping Cart**: Utilizes Local Storage to manage user cart data.
- **Cart Functionality**: Users can add, update, and remove items from the cart.
- **Checkout**: Initiates an AJAX request to create an order, updating product quantities and clearing the cart.
- **Orders Dashboard**: Admins can view, process, and manage orders.

## 6. Cart Management
- **Add to Cart**: Clicking the "Add to Cart" button stores product ID, quantity, and name in Local Storage.
- **Cart Page**: Retrieves cart data from Local Storage, presenting it in a tabular format.
- **Update and Delete**: Users can adjust quantities and remove items directly from the cart.
- **Checkout**: Sends AJAX request to create an order, updating quantities and clearing cart data on success.

## 7. API Documentation
- `GET /api/products`: Fetches a list of products with their associated categories.
- `POST /api/order`: Accepts user details and cart contents to create an order.
- Postman Documentation: **https://documenter.getpostman.com/view/11416659/2s9Y5bQgpQ**


## 8. Installation Steps
To set up and run the E-Commerce application on your local environment:

1. Clone the repository: `git clone https://github.com/devabdelrahmannasr/ecommerce-task`
2. Navigate to the project directory: `cd ecommerce-task`
3. Install dependencies: `composer install`
4. Create a `.env` file: `cp .env.example .env`
5. Generate an application key: `php artisan key:generate`
6. Configure your database settings in the `.env` file.
7. Run migrations: `php artisan migrate`
8. Seed the database with categories and products: `php artisan db:seed`
9. Start the development server: `php artisan serve`
10. Access the application in your browser at `http://localhost:8000`

## 9. Why Local Storage?
 I'm using Local Storage to demonstrate my skills in JavaScript and enhance the user experience. It allows me to store and manage cart data on the client side, ensuring a seamless shopping journey by maintaining selections across pages and sessions. This showcases my proficiency in client-side scripting and improves overall application responsiveness.

## 10. Conclusion
Completing this task within a span of just 3 hours and 30 minutes was an engaging and productive experience.
