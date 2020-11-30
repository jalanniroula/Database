<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="stylesTwo.css">
  <title> ViCE</title>
  <div class="topnav">
    <a href="index.php">Home</a>
    <a href="contribute.html">Contribute</a>
    <a  href="events.php">Events</a>
    <a href="about.html">About</a>
    <a class="active" href="blog.php">Blog</a>
    <a href="logout.php">Logout</a>
  </div>
</head>
<body>

Thank you, for using this.
<section id="Blogform">
  <form action="blogInsert.php" method="post">

    <label for="title">Title</label>
    <input type="text" id="title" name="title">

    <textarea name="BlogContent" rows="10" cols="30"> Add Post here
    </textarea>
    <br>
    <label for="Date">Date</label>
    <input type="date" id="date" name="timeStamp">

  <input type="submit" value="Publish">
</form>
</section>

<h1>For deleting a post use this below <h1>
  <section id="Blogform">
    <form action="BlogDelete.php" method="post">

      <label for="blog_id">ID</label>
      <input type="text" id="blogid" name="blogid">

    <input type="submit" value="Delete">
  </form>
  </section>
</body>
</html>
