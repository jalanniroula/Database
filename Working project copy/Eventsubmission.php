<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesTwo.css">
  <title> ViCE</title>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a class="active" href="events.php">Events</a>
    <a href="about.html">About</a>
    <a href="blog.php">Blog</a>
    <a href="logout.php">Logout</a>
  </div>
</head>
<body>

<section id="EventForm">
  <form action="EventInsert.php" method="post">

    <label for="title">Title</label>
    <input type="text" id="title" name="Eventtitle">

    <label for="Contact">Contact</label>
    <input type="text" id="Contact" name="EventContact">

    <label for="Email">Email</label>
    <input type="text" id="email" name="EventEmail">

    <textarea name="EventDescription" rows="10" cols="30"> Add Description here
    </textarea>
    <br>
    <label for="Date">Date</label>
    <input type="date" id="date" name="timeStamp">

  <input type="submit" value="Schedule">
</form>
</section>

<h1>For deleting an Event use this below <h1>
  <section id="Event">
    <form action="EventDelete.php" method="post">

      <label for="Event ID">ID</label>
      <input type="text" id="eventid" name="EventID">

    <input type="submit" value="Delete">
  </form>
  </section>
</body>
</html>
