# Noxus Game - User Authentication, Email Confirmation, CRUD Operations, and Entity Relationships

Noxus Game is a Symfony-based application that demonstrates user authentication, email confirmation, CRUD operations for entities, and handling relationships between different entities such as `User`, `Product`, and `Category`.

## Description

This Symfony application includes the following core features:

### 1. User Authentication:
- **Registration**: Users can register by providing their email and password.
- **Login**: Users can log in to access protected routes within the application.
- **Password Security**: Passwords are securely hashed using Symfony's built-in security features to ensure data safety.

### 2. Email Confirmation:
- Upon successful registration, a confirmation email is sent to the user's email address.
- The user must click the confirmation link in the email to activate their account and complete the registration process.
- This ensures that only valid email addresses are registered and used in the system.

### 3. CRUD Operations:
- **Product Management**: Admin users can create, read, update, and delete products.
- **Category Management**: Admin users can create, read, update, and delete categories.
- **Entity Interaction**: CRUD operations are available for the `Product` and `Category` entities, making it easy for admins to manage the product catalog.

### 4. Entity Relationships:
- **User-Product Relationship**: A one-to-many relationship where each user can have many products. This relationship is implemented using Symfony's Doctrine ORM.
- **Product-Category Relationship**: A many-to-one relationship where each product belongs to a single category. Each category can have many products, providing a clean and organized catalog structure.
  
The application demonstrates the power of Symfony's Doctrine ORM to handle these relationships seamlessly and efficiently.

## Additional Features:
- The application is built with Symfony's best practices for security, ensuring user data is protected.
- The email confirmation feature helps maintain the integrity of user accounts by verifying email addresses before allowing full access.
- The CRUD operations provide a user-friendly admin interface to manage products and categories effectively.
- The entity relationships ensure that the application scales easily with more data and offers flexibility in managing different entities.

Noxus Game is designed to be a solid foundation for building more complex Symfony applications with user management, product catalogs, and other essential features.
