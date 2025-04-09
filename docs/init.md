# Laravel App Setup for Financial Management System

Based on your requirements, I'll outline a comprehensive database structure and initial setup for your Laravel financial management app.

## Database Structure

### 1. Users Table (Default Laravel)
```
- id
- name
- email
- password
- remember_token
- created_at
- updated_at
```

### 2. Cash Registers (Caisses)
```
- id
- user_id (foreign key)
- name
- type (physique/mobile_money)
- initial_balance (decimal)
- current_balance (decimal)
- currency (string)
- is_active (boolean)
- created_at
- updated_at
```

### 3. Cash Movements
```
- id
- cash_register_id (foreign key)
- user_id (foreign key)
- type (deposit/withdrawal)
- amount (decimal)
- description (text)
- reference (string)
- movement_date (datetime)
- created_at
- updated_at
```

### 4. Expense Categories
```
- id
- user_id (foreign key)
- name
- description
- color (for UI)
- icon (for UI)
- created_at
- updated_at
```

### 5. Expenses
```
- id
- user_id (foreign key)
- cash_register_id (foreign key)
- category_id (foreign key)
- amount (decimal)
- description
- expense_date (date)
- is_recurring (boolean)
- recurrence_interval (nullable)
- created_at
- updated_at
```

### 6. Budgets
```
- id
- user_id (foreign key)
- category_id (foreign key)
- amount (decimal)
- period (monthly/quarterly/yearly)
- start_date (date)
- end_date (date)
- created_at
- updated_at
```

### 7. Anomaly Reports
```
- id
- user_id (foreign key)
- cash_register_id (foreign key)
- type (discrepancy/unusual_activity)
- amount_discrepancy (decimal)
- description
- resolved (boolean)
- resolved_at (nullable)
- created_at
- updated_at
```

## Initial Setup Steps

1. **Install Laravel**
   ```bash
   composer create-project laravel/laravel financial-app
   cd financial-app
   ```

2. **Configure Database**
   - Set up your `.env` file with database credentials
   - Run migrations:
     ```bash
     php artisan migrate
     ```

3. **Create Models and Migrations**
   ```bash
   php artisan make:model CashRegister -m
   php artisan make:model CashMovement -m
   php artisan make:model ExpenseCategory -m
   php artisan make:model Expense -m
   php artisan make:model Budget -m
   php artisan make:model AnomalyReport -m
   ```

4. **Set Up Authentication**
   ```bash
   composer require laravel/ui
   php artisan ui vue --auth
   npm install && npm run dev
   ```

5. **Create Controllers**
   ```bash
   php artisan make:controller CashRegisterController --resource
   php artisan make:controller ExpenseController --resource
   php artisan make:controller BudgetController --resource
   php artisan make:controller ReportController
   php artisan make:controller DashboardController
   ```

6. **Set Up Routes (routes/web.php)**
   ```php
   Auth::routes();
   
   Route::middleware(['auth'])->group(function () {
       Route::get('/', 'DashboardController@index')->name('dashboard');
       
       // Cash Registers
       Route::resource('cash-registers', 'CashRegisterController');
       
       // Expenses
       Route::resource('expenses', 'ExpenseController');
       Route::resource('expense-categories', 'ExpenseCategoryController');
       
       // Budgets
       Route::resource('budgets', 'BudgetController');
       
       // Reports
       Route::get('reports/cash-flow', 'ReportController@cashFlow');
       Route::get('reports/expense-trends', 'ReportController@expenseTrends');
       Route::get('reports/budget-vs-actual', 'ReportController@budgetVsActual');
       
       // Anomalies
       Route::get('anomalies', 'AnomalyReportController@index');
   });
   ```

7. **Create Seeders for Initial Data**
   ```bash
   php artisan make:seeder ExpenseCategoriesTableSeeder
   ```

8. **Set Up Relationships in Models**

Example for User model:
```php
public function cashRegisters()
{
    return $this->hasMany(CashRegister::class);
}

public function expenses()
{
    return $this->hasMany(Expense::class);
}

public function budgets()
{
    return $this->hasMany(Budget::class);
}
```

## Additional Recommendations

1. **API Routes (for mobile app)**
   Set up API routes in `routes/api.php` with JWT or Sanctum authentication.

2. **Dashboard Components**
   - Current cash balance across all registers
   - Expense trends chart
   - Budget vs actual spending
   - Recent transactions
   - Anomaly alerts

3. **Notification System**
   Set up notifications for:
   - Budget thresholds reached
   - Unusual cash movements
   - System anomalies

4. **Reporting Features**
   - Daily/weekly/monthly cash reports
   - Expense categorization reports
   - Budget performance reports

5. **Security Considerations**
   - Implement role-based access control
   - Audit logs for sensitive operations
   - Data validation for all inputs

Would you like me to elaborate on any specific part of this setup or provide sample code for any particular component?