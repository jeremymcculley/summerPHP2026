<?php
/**
 * WEEK 1: Variables and Conditionals
 * Goal: Control the "UI" using back-end logic.
 */

// --- 1. USER DATA (Students can change these to test the logic) ---
$username = "Jeremy";
$userRole = "instructor"; // Options: 'student', 'instructor', 'guest'
$accountBalance = 45.50;
$isGraduated = false;
$currentHour = (int)date("H"); // Get hour (0-23)

// --- 2. LOGIC SECTION ---

// Determine a greeting based on the hour
if ($currentHour < 12) {
    $greeting = "Good Morning";
} elseif ($currentHour < 17) {
    $greeting = "Good Afternoon";
} else {
    $greeting = "Good Evening";
}

// Determine a CSS class based on the user role
if ($userRole == "instructor") {
    $themeClass = "gold-border";
} else {
    $themeClass = "blue-border";
}

// Logical Operators: Check if they are a student AND have a balance
$needsToPay = ($userRole == "student" && $accountBalance > 0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Week 1 Lesson</title>
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <meta name="description" content="This week we are looking at the basic PHP syntax">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <header>
    <h1>Introduction to PHP</h1>
  </header>
  <main>
    <section class="card <?php echo $themeClass; ?>">
      <h2><?php echo $greeting . ", " . $username; ?></h2>
      <p>Your current role is: <strong><?php echo $userRole; ?></strong></p>
      <!-- Use PHP to show/hide entire blocks of HTML -->
      <?php if ($userRole == "instructor"): ?>
        <p><strong>Instructor Tools:</strong> You have access to grade assignments.</p>
      <?php else: ?>
        <p><strong>Student Portal:</strong> View your weekly modules below.</p>
      <?php endif; ?>
      <!-- Warning message using our AND logic -->
      <?php if ($needsToPay): ?>
        <div class="alert">
          <p>Notice: You have an outstanding balance of $<?php echo $accountBalance; ?>.</p>
        </div>
      <?php endif; ?>
      <h3>Status Check:</h3>
      <p>Graduation Status: 
        <?php 
          // Ternary operator: a "shortcut" if/else for variety
          echo ($isGraduated) ? "Completed" : "In Progress"; 
        ?>
      </p>
    </section>
  </main>
  <footer>
    <!-- 
      The date() function returns a string based on the format character provided. 
      "Y" (capital) returns a 4-digit representation of the current year. 
    -->
    <p>&copy; <?php echo date("Y"); ?> Jeremy McCulley. All Rights Reserved. </p>
    <!-- 
      You can combine multiple format characters in one string:
      "l" (lowercase L) = Full day of the week (e.g., Wednesday)
      "F" = Full month name (e.g., May)
      "j" = Day of the month without leading zeros (e.g., 6)
      "S" = English ordinal suffix (e.g., st, nd, rd, or th)
    -->
    <p>Last updated: <?php echo date("F j, Y"); ?></p>
  </footer>
</body>
</html>