# Premier University Computer Club Main System (Developer guide)

&nbsp;

## **1. Prerequisites**

1. **PHP** : PHP 8.2.12
2. **Composer** : version 2.7.6
3. **Node.js** and **npm** : v20.11.1
4. **Database** : MySQL (phpmyadmin)

&nbsp;

## **2. Project Setup**

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/dev-pucc/pucc-main-system.git
   cd pucc-main-system
   ```

2. **Install Dependencies:**

Note : **IF you need to add any new dependency for any feture developement ask in the group first! before adding**

   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration:**

    If you are using Git Bash or the Command Prompt (CMD) on Windows, the `cp` command to copy `.env.example` to `.env` may not work because `cp` is a Linux/Unix command. Here's the alternative:

    - Using Command Prompt (CMD):

    ```cmd
    copy .env.example .env
    ```

    - Using Git Bash:

    ```bash
    cp .env.example .env
    ```

4. **Set up database credentials in the `.env` file:**

    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=pucc-main
        DB_USERNAME=root
        DB_PASSWORD=
    ```

5. **Generate Application Key:**

   ```bash
    php artisan key:generate
   ```

6. **Run Database Migrations:**

   ```bash
    php artisan migrate
   ```

7. **Start the Development Server:**

   ```bash
    php artisan serve
   ```

&nbsp;

## **3. Authentication Setup**

This project uses **Laravel UI v4.x** for authentication scaffolding.

To customize the UI:

1. Generate authentication scaffolding:

   ```bash
    php artisan ui bootstrap --auth
   ```

2. Rebuild assets:

   ```bash
   npm run dev
   ```

---

## **3. Git Workflow and Collaboration Rules**

### 1. Branching Strategy

- The `main` branch is for production-ready code.
- **Make new branch** branch is for staging new features and testing. Name brach according to the features.

### 2. Commit Messages

**Contact on chat group before commiting**

- Follow this format:
  `[type]: <short description>`  
  Examples:  
  - `added : new file / folder added, created`
  - `removed : removed file / deleted file that has been pushed into repo`
  - `modified : existing file / folder modification` 
  - `feat: add user registration module`  
  - `fix: resolve fund calculation bug`  
  - `docs: update README with setup steps`

### 3. Pull Request Guidelines

- Submit a PR to merge your branch into `main`
- Add a clear description of your changes.

### 4. Merging to `main`

- **First show code for code review untill review is done DONT merge into the main**
- Only merge after approval from chat gruop

&nbsp;

## **4. Rules for Collaboration**

1. Always **sync your branch** with `develop` **if more than one people working in same features** And discuss and track each others codes while woriking on same features:
2. Use proper **naming conventions** for variables, functions, and classes.
3. Avoid committing large or unnecessary files (e.g., `node_modules`, `.env`, IDE settings).
4. Document your changes clearly in comments and commit messages.
5. Report bugs or issues in the project tracker promptly.

&nbsp;

## **5. Code Writing Rules**

To ensure code consistency, readability, and maintainability, all developers must adhere to the following coding standards:

### 1. **Spacing**

- Before every section of code add 5 new lines and a comment "Section_name START"
- After every section of code add 5 new lines and a comment "Section_name END"

### 2. **Follow PSR Standards**

- Use **camelCase** for variables and method names.
- Use **PascalCase** for controller and class names.
- Use **snake_case** for database columns and table names.

### 3. **File and Folder Structure**

- **One folder per feature:** Create a dedicated folder for each feature within the `app/Http Controllers` and `resources/views` directories.

Example

```bash
       app/
       ├── Http/
       │   ├── Controllers/
       │   │   ├── User/
       │   │   │   ├── ProfileController.php
       │   │   ├── Fund/
       │   │   │   ├── FundController.php
```

- Group related files together, such as controllers, views, services, and tests for a specific feature.

### 4. **Controller Naming**

- Use singular names for controllers, e.g., `UserController`, `FundController`.

### 5. **Route Organization**

- Put the routes in mentioned postion. Dont touch any code that is not related to you.

### 6. **Naming Conventions**

- **Variables:** Use descriptive names in `camelCase` (e.g., `$userEmail`, `$totalFunds`).
- **Methods:** Name methods based on their functionality, using `camelCase` (e.g., `getUserDetails`, `calculateFundBalance`).
- **Classes:** Use `PascalCase` for classes (e.g., `UserService`, `FundController`).

### 7. **Database**

- Table names must be plural (`users`, `funds`, `transactions`).
- Columns must use `snake_case` (e.g., `user_id`, `total_amount`).

### 8. **Blade Templates**

- Use `snake_case` for view file names and organize views in folders based on features.
- Example:

```bash
       resources/views/
       ├── user/
       │   ├── profile.blade.php
       │   ├── settings.blade.php
       ├── fund/
       │   ├── overview.blade.php
   ```

### 9. **Testing**

- Do manual testing of everyting that is interaction able
