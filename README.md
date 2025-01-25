# Game Project - AlphaNumeric Planet Adventures - README

## Developers:
- **Daiane (Developer 1, 2):**
   - Creation of user accounts or registration (Sign-Up).
   - Real-time validation of information entered by the user in the user account creation form with AJAX.
   - Login to an existing user account (Sign-In).
   - Disconnect from a connected user account (Sign-Out and Time-Out).
   - Management of several levels of a question/answer game which follow one another.
   - Abandoning a game in progress.
   
- **Sarah (Developer 3):**
   - Creation of the structure to create and exchange data with the database.
   - Changing the password of an existing user account.
   - Management of several levels of a question/answer game which follow one another.
   
- **Kosar (Developer 4, 5):**
   - Management of several levels of a question/answer game which follow one another.
   - Creation of the structure of web pages to display (e.g., head, header, nav, footer).
   - Display of the history of the results of all game rounds.
   
- **Aurelien (Developer 6):**
   - Creation and implementation of the GitHub account.
   - Creation of the structure of folders and files.
   - Management of several levels of a question/answer game which follow one another.
   - Coordination of the integration of different functionalities.
//
## Release Date: 18/04/2024

## Features:
1. Order 6 letters in ascending order
2. Order 6 letters in descending order
3. Order 6 numbers in ascending order
4. Order 6 numbers in descending order
5. Identify the first and last letter in a set of 6 letters
6. Identify the smallest and largest number in a set of 6 numbers
7. Additional Features:
   - Some transitional pages(GameOver/Congratulations/UserNotFound) to make easier for user;

## How the Game Works:
- The game consists of 6 levels.
- Each level presents a different sorting or identification challenge.
- To progress to the next level, the player must successfully complete the previous level.
- Levels include sorting letters and numbers in ascending and descending order, as well as identifying extremes within sets.

## Game End Scenarios:
1. Game Over:
   - Occurs when the player exhausts all lives without completing the final level.
2. Incomplete:
   - Happens when the player cancels the game, times out due to inactivity, or logs out during gameplay.
3. Win:
   - Achieved when the player completes all levels without exhausting lives.

## Technical Information:
- Programming Languages: HTML, CSS, JavaScript (for AJAX), PHP
- Database Management System: MySQL (via WAMP)
- Additional Information:
   - Utilized WAMP stack for local development environment.
   - AJAX used for real-time validation and dynamic content updates.
   - PHP for server-side logic and database interactions.
   - HTML and CSS for frontend structure and styling.

## Game Content for Each Level:
1. **Level 1:** Order 6 letters in ascending order
2. **Level 2:** Order 6 letters in descending order
3. **Level 3:** Order 6 numbers in ascending order
4. **Level 4:** Order 6 numbers in descending order
5. **Level 5:** Identify the first and last letter in a set of 6 letters
6. **Level 6:** Identify the smallest and largest number in a set of 6 numbers