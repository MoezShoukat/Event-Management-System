<?php
session_start();
include("connect.php");
include("data_of_event.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@277&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Host+Grotesk&display=swap" rel="stylesheet">
    <title>Event-Ease</title>
    <link rel="stylesheet" href="Event.css">
</head>
<body>
    
    <header>
        <nav>
            <img src="/EventEase.logo.png" alt="EVENTEASE Logo" class="nav-logo">
            <ul>
                <li><a href="#" id="homeLink">Home</a></li>
                <li><a href="#" id="viewEvents">View Events</a></li>
                <li><a href="#" id="createEvent">Create Event</a></li>
                <li><a href="logout.php" id="Logout">Logout</a></li>
               
            </ul>
        </nav>
    </header>
    
    
    
    <section id="homePage">
        <div class="container">
            <div class="section">
                <div class="text-content">
                    <span class="badge">Manage your Event with Ease</span>
                    <h1>Manage your Event and invite others</h1>
                    <p>Enjoy the live performance of a Band and let the music change the mood, turning your "I don't like to" to "I like to move it move it!" and experiencing the new you. Let those body and mind get in tune with the music and start Vibing.</p>
                    
                </div>
                <div class="image-content">
                    <img class="interactive-image" src="/back-view-audience-with-arms-raised-front-stage-music-concert.jpg" alt="Live Music">
                </div>
            </div>
            <div class="section">
                <div class="image-content">
                    <img class="interactive-imageLeft"  src="/grilled-vegetables-served-with-lavash-species.jpg" alt="Resturant">
                </div>
                <div class="text-content">
                    <span class="badge">Showcase your Events</span>
                    <h1>Create, Publish, and Enjoy</h1>
                    <p>Gather your loved ones and get ready for an unforgettable night out! Book a luxurious restaurant and indulge in a culinary extravaganza. Savor every bite of your favorite dish, surrounded by laughter, warmth, and the people who matter most. Make memories that last a lifetime as you share stories, toast to new beginnings, and create an evening that will leave you craving for more. Treat your taste buds and your tribe to an unforgettable feast!"
                    </p>
                </div>
                
            </div>
            <div class="section">
                <div class="text-content">
                    <span class="badge">Invite others to celebrate with you</span>
                    <h1>Celebrate your special day with everyone</h1>
                    <p>Get ready to celebrate your special day in style! Set your date, time, and venue for an unforgettable night of fun, friends, and festivities. Delicious food, refreshing drinks, and thrilling games await! Book your Event now and make some unforgettable memories with us.
                    </p>
                    
                </div>
                <div class="image-content">
                    <img class="interactive-image" src="/playful-games-birthday-party-nature-background.jpg" alt="Birthday party">
                </div>
            </div>
        </div>
    </section>
    <main>
        <section id="eventList" class="hidden">
            <h2 class="anileft">Upcoming Events</h2>
            <div id="eventContainer" class="event-grid"></div>
        </section>

        <section id="createEventForm" class="hidden">
            <video autoplay muted loop id="event-video">
                <source src="/Comp_1_59.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <h2 class="anileft">Create New Event</h2>
            <form class="formation" id="newEventForm" method="post" action="data_of_event.php">
                <label for="eventName">Event Name:</label>
                <input type="text" id="eventName" name="name" required>
            
                <label for="eventDate">Date:</label>
                <input type="date" id="eventDate" name="date" required>
            
                <label for="eventTime">Time:</label>
                <input type="time" id="eventTime" name="time" required>
            
                <label for="eventLocation">Location:</label>
                <input type="text" id="eventLocation" name="location" required>
            
                <label for="eventDescription">Description:</label>
                <textarea id="eventDescription" name="description" required></textarea>
            
                <button class="create-event" type="submit">Create Event</button>
            </form>
            
        </section>
    </main>
<br>
<footer class="footer">
    <p>&copy; 2024 Event-Ease. All rights reserved.</p>
</footer>


    <script src="Event.js"></script>
</body>
</html>

