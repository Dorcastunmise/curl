## cURL: A Developer’s Guide
Introduction

cURL (Client URL) is a powerful command line tool and library for transferring data using various protocols such as HTTP, HTTPS, FTP, and many more. It is widely used for interacting with APIs, downloading files, simulating browser requests, and automating web tasks.

As a developer, understanding cURL in both command-line form and as a programming library (like in PHP) provides a strong foundation for working with the modern web.

# Why Learn cURL?

Test and debug APIs quickly.

Automate data transfers between servers.

Simulate requests that browsers make.

Perform authentication and handle headers.

Upload and download files.

# Part 1: cURL on the Command Line
Basic GET Request
curl https://httpbin.org/get


Sends a simple GET request and prints the response.

Adding Headers
curl -H "Content-Type: application/json" https://httpbin.org/get

Sending Data (POST)
curl -X POST https://httpbin.org/post \
     -H "Content-Type: application/json" \
     -d '{"name":"Tunmise","role":"Engineer"}'

Authentication Example
curl -X POST https://api.example.com/auth \
     -H "Content-Type: application/json" \
     -d '{"username":"john","password":"1234"}'


Response:

{ "access_token": "abc123" }


Use the token:

curl https://api.example.com/users/me \
     -H "Authorization: Bearer abc123"

File Transfers

Upload:

curl -X POST https://api.example.com/upload \
     -F "file=@/home/user/picture.jpg"


Download:

curl -O https://example.com/file.zip

Debugging Requests
curl -v https://httpbin.org/get
curl -D headers.txt -o body.json https://httpbin.org/get

# Part 2: cURL in PHP

The cURL library in PHP lets you make HTTP requests inside your applications.

Basic GET
$curl = curl_init("https://httpbin.org/get");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

echo $response;

POST with Data
$curl = curl_init("https://httpbin.org/post");

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
    CURLOPT_POSTFIELDS => json_encode(["name" => "Tunmise", "role" => "Engineer"]),
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response;

Handling Headers and Authentication
$curl = curl_init("https://api.example.com/users/me");

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer abc123",
        "User-Agent: MyApp/1.0"
    ],
]);

$response = curl_exec($curl);
curl_close($curl);

echo $response;

Command Line vs PHP Library

Command Line: Ideal for quick testing, debugging, and one-off requests.

PHP cURL: Best for embedding requests in web applications and automating tasks.

Together, these two “worlds” of cURL make it a versatile tool in every developer’s toolkit.

# Conclusion

Mastering both the command line usage and PHP’s cURL functions opens the door to better API integrations, data handling, and web automation. Whether you are testing endpoints or building production systems, cURL remains one of the most reliable companions for developers.