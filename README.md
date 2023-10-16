
---

# NeonQL PHP Library

The NeonQL PHP library enables you to connect to a NeonQL server, facilitating GET, PUT, DELETE, and TESTAUTH operations.

## Installation

1. **Download the Library:** Save the `NeonQL.php` file to your project directory.

2. **Include the Class:** Integrate the class into your PHP script using the `require` statement.

   ```php
   require_once('NeonQL.php');
   ```

3. **Create an Instance:** Instantiate the NeonQL class by specifying your NeonQL server base URL and password.

   ```php
   $base_url = 'http://your_neonql_server_url';
   $password = 'your_password';
   $neonQL = new NeonQL($base_url, $password);
   ```

## Usage

### GET Data

To retrieve data from the NeonQL server:

```php
$dataname = 'your_dataname';
$response = $neonQL->get($dataname);
```

### PUT Data

To store data in the NeonQL server:

```php
$dataname = 'your_dataname';
$data = 'your_data_to_store';
$neonQL->put($dataname, $data);
```

### DELETE Data

To delete data from the NeonQL server:

```php
$dataname = 'your_dataname';
$neonQL->delete($dataname);
```

### Authenticate

To test authentication:

```php
$response = $neonQL->testAuth();
```

## Example

Here's an example script demonstrating how to use the NeonQL PHP library:

```php
// Include the NeonQL class file
require_once('NeonQL.php');

// Your NeonQL server base URL and password
$base_url = 'http://your_neonql_server_url';
$password = 'your_password';

// Create an instance of the NeonQL class
$neonQL = new NeonQL($base_url, $password);

// Perform operations using the NeonQL class
$getResponse = $neonQL->get('your_dataname');
$putResponse = $neonQL->put('your_dataname', 'your_data_to_store');
$deleteResponse = $neonQL->delete('your_dataname');
$testAuthResponse = $neonQL->testAuth();

// Now you can work with the responses as needed
// ...
```

Replace `'your_dataname'`, `'your_data_to_store'`, `'your_neonql_server_url'`, and `'your_password'` with your specific values.

Ensure to handle errors, implement security measures, and customize the library according to your production environment requirements.

---

