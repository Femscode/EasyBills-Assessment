<h1>Setup Instructions</h1>

<p>Follow these steps to set up and run the project locally:</p>

<ol>
  <li><strong>Clone Repository:</strong><br>
    <code>git clone &lt;github.com:Femscode/EasyBills-Assessment.git&gt;<br>
    cd &lt;EasyBills&gt;</code></li>

  <li><strong>Install Dependencies:</strong><br>
    <code>composer install</code></li>

  <li><strong>Set Environment Variables:</strong><br>
    <ul>
      <li>Copy <code>.env.example</code> to <code>.env</code></li>
      <li>Configure your database connection settings in <code>.env</code></li>
    </ul>
  </li>

  <li><strong>Run Migrations and Seeders:</strong><br>
    <code>php artisan migrate --seed</code></li>

  <li><strong>Generate Application Key:</strong><br>
    <code>php artisan key:generate</code></li>

  <li><strong>Start Development Server:</strong><br>
    <code>php artisan serve</code></li>

  <li><strong>Run Tests:</strong><br>
    <code>php artisan test</code></li>
</ol>

<p><strong>Laravel Version:</strong> "11.15.0"</p>
<p><strong>PHP Version:</strong> "8.2.4" </p>
<p><strong>PHP Version:</strong> "8.2.4" </p>

<p><strong>Authentication:</strong> To perform transactions assigned to a specific user, authentication is required. Ensure API requests are authenticated with the user's credentials before making transaction-related requests.</p>

<h2> POSTMAN WORKSPACE URL : <a href='https://bold-meteor-622369.postman.co/workspace/EasyBills~2edb13e2-fb29-4533-ad3f-34fb77f591fe/collection/20411120-47002a02-cb16-473a-8845-0d9a32f772c1?action=share&creator=20411120'>https://bold-meteor-622369.postman.co/workspace/EasyBills~2edb13e2-fb29-4533-ad3f-34fb77f591fe/collection/20411120-47002a02-cb16-473a-8845-0d9a32f772c1?action=share&creator=20411120</a></h2>
