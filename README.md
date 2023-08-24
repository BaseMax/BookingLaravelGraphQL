# Book Management System

The Book Management System will be a web application that allows users to manage their personal book collections. Users can add, update, delete, and view details of their books. The system will use GraphQL for querying and mutating book data.

## Features

- **User Authentication:** Implement user authentication and authorization to ensure that only authorized users can access and manage their book collections.
- **Book CRUD Operations:** Users can perform CRUD (Create, Read, Update, Delete) operations on their books. This includes adding new books, updating book information, marking books as read/unread, and deleting books.
- **Book Categorization:** Allow users to categorize their books based on genres, authors, and other relevant attributes. Users can assign multiple categories to a book.
- **Search and Filtering:** Implement search and filtering capabilities, allowing users to quickly find books by title, author, category, etc.
- **GraphQL API:** Design a GraphQL schema that defines types and queries/mutations for handling book-related operations. Use Laravel's built-in support for GraphQL to create the necessary resolvers and controllers.
- **User Profiles:** Create user profiles where users can see their book collection statistics, reading progress, and update their profile information.
- **Reading Progress Tracking:** Allow users to track their reading progress for each book. Users can update their progress and mark books as "currently reading," "finished," or "to be read."
- **Reviews and Ratings:** Enable users to write reviews and rate books they've read. You can also implement a way for users to see overall book ratings and reviews.
- **Notifications:** Implement a notification system that sends users notifications about upcoming book releases, recommendations, and updates related to their favorite genres or authors.
- **Integration with External APIs:** Consider integrating with external book-related APIs to fetch additional book information, covers, author details, and more.

## Tech Stack

- **Laravel 10:** Use the latest version of Laravel for building the backend application, handling database interactions, and implementing the GraphQL API.
- **PHP 8.2:** Leverage the features and improvements introduced in PHP 8.2 for efficient and modern code development.
- **GraphQL:** Implement the GraphQL API using the Laravel GraphQL package to handle schema creation, queries, mutations, and resolvers.
- **MySQL or PostgreSQL:** Choose a relational database to store user data, book information, and other relevant data.
- **Frontend Framework:** You can use a frontend framework like Vue.js or React.js to build the user interface for interacting with the GraphQL API.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/BaseMax/BookingLaravelGraphQL.git
   ```

2. Install dependencies:

  ```bash
  composer install
  npm install # or yarn install
  ```

3. Configure the .env file with your database settings and other configurations.

4. Run migrations and seeders:

  ```bash
  php artisan migrate --seed
  ```

5. Start the development server:

  ```bash
  php artisan serve
  ```

6. Access the application in your browser at `http://localhost:8000`.

## GraphQL Queries and Mutations

Below are some example GraphQL queries and mutations you can use to interact with the API. You can find more in the documentation.

| Action                 | Query / Mutation                                                 |
|------------------------|------------------------------------------------------------------|
| Get all books          | `query { books { id title author category } }`                   |
| Get book by ID         | `query { book(id: 1) { title author category } }`                |
| Add a new book         | `mutation { addBook(input: { title author category }) { id } }`   |
| Update a book          | `mutation { updateBook(id: 1, input: { title }) { id title } }`   |
| Delete a book          | `mutation { deleteBook(id: 1) }`                                 |
| Get all categories     | `query { categories { id name } }`                              |
| Add a new category     | `mutation { addCategory(input: { name }) { id name } }`          |
| Update a category      | `mutation { updateCategory(id: 1, input: { name }) { id name } }`|
| Delete a category      | `mutation { deleteCategory(id: 1) }`                            |
| Get user profile       | `query { userProfile { username email } }`                      |
| Update user profile    | `mutation { updateUserProfile(input: { email }) { username } }`  |
| Get reading progress   | `query { readingProgress(bookId: 1) }`                          |
| Update reading progress| `mutation { updateReadingProgress(bookId: 1, status: "Read") }`  |
| Get book reviews       | `query { book(id: 1) { reviews { id content rating } } }`        |
| Add a book review      | `mutation { addReview(bookId: 1, input: { content rating }) { id } }` |
| Update a review        | `mutation { updateReview(id: 1, input: { content }) { id content } }` |
| Delete a review        | `mutation { deleteReview(id: 1) }`                               |
| Get notifications      | `query { notifications { id message type } }`                   |
| Mark notification as read | `mutation { markNotificationRead(id: 1) }`                    |
| Search books by title  | `query { searchBooks(title: "Keyword") { id title } }`           |
| Filter books by category | `query { filterBooksByCategory(categoryId: 1) { id title } }` |
| Get top-rated books    | `query { topRatedBooks { id title rating } }`                    |
| Get book recommendations| `query { bookRecommendations { id title } }`                    |
| Get author details     | `query { author(id: 1) { name bio } }`                          |
| Add a new author       | `mutation { addAuthor(input: { name bio }) { id name } }`        |
| Update an author       | `mutation { updateAuthor(id: 1, input: { name }) { id name } }`  |
| Delete an author       | `mutation { deleteAuthor(id: 1) }`                               |
| Get user reading list  | `query { userReadingList { id title author } }`                  |
| Add book to reading list | `mutation { addToReadingList(bookId: 1) }`                     |
| Remove book from reading list | `mutation { removeFromReadingList(bookId: 1) }`             |
| Get book details       | `query { bookDetails(id: 1) { title author category reviews { content rating } } }` |
| Get unread notifications | `query { unreadNotifications { id message type } }`             |
| Add book to favorites  | `mutation { addToFavorites(bookId: 1) }`                         |
| Remove book from favorites | `mutation { removeFromFavorites(bookId: 1) }`                 |
| Get user favorite books| `query { userFavoriteBooks { id title author } }`                |
| Mark book as read      | `mutation { markBookAsRead(bookId: 1) }`                         |
| Get recently added books | `query { recentlyAddedBooks { id title author } }`             |
| Rate a book            | `mutation { rateBook(bookId: 1, rating: 5) }`                   |
| Get average rating for a book | `query { book(id: 1) { averageRating } }`                  |
| Get user unread count  | `query { unreadNotificationCount }`                              |
| Get total book count   | `query { totalBookCount }`                                       |
| Get total user count   | `query { totalUserCount }`                                       |
| Get book count by category | `query { bookCountByCategory(categoryId: 1) }`               |
| Get user notifications by type | `query { userNotificationsByType(type: "Recommendation") { id message } }` |
| Get user favorite authors | `query { userFavoriteAuthors { id name } }`                   |
| Get user reviews       | `query { userReviews { id content book { title } } }`            |
| Get user reading progress | `query { userReadingProgress { book { title } status } }`       |
| Get user reading history | `query { userReadingHistory { book { title } status } }`         |
| Add book to reading history | `mutation { addToReadingHistory(bookId: 1) }`                |
| Get user favorite categories | `query { userFavoriteCategories { id name } }`               |
| Get user favorite books by category | `query { userFavoriteBooksByCategory(categoryId: 1) { id title } }` |
| Get user favorite authors by category | `query { userFavoriteAuthorsByCategory(categoryId: 1) { id name } }` |

Copyright 2023, Max Base
