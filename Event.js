document.addEventListener('DOMContentLoaded', () => {
    const homeLink = document.getElementById('homeLink');
    const viewEventsLink = document.getElementById('viewEvents');
    const createEventLink = document.getElementById('createEvent');
    const eventListSection = document.getElementById('eventList');
    const createEventFormSection = document.getElementById('createEventForm');
    const homePageSection = document.getElementById('homePage');
    const eventContainer = document.getElementById('eventContainer');

    // Function to show the home page
    homeLink.addEventListener('click', (e) => {
        e.preventDefault();
        homePageSection.classList.remove('hidden');
        eventListSection.classList.add('hidden');
        createEventFormSection.classList.add('hidden');
    });

    // Function to show the events list and fetch events
    viewEventsLink.addEventListener('click', (e) => {
        e.preventDefault();
        homePageSection.classList.add('hidden');
        eventListSection.classList.remove('hidden');
        createEventFormSection.classList.add('hidden');
        
        fetchAndDisplayEvents();
    });

    // Function to show the create event form
    createEventLink.addEventListener('click', (e) => {
        e.preventDefault();
        homePageSection.classList.add('hidden');
        eventListSection.classList.add('hidden');
        createEventFormSection.classList.remove('hidden');
    });

    // Function to fetch and display events
    function fetchAndDisplayEvents() {
        fetch('getEvent.php')
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data);
                eventContainer.innerHTML = '';
                if (data.length === 0) {
                    eventContainer.innerHTML = '<p>No events found.</p>';
                } else {
                    data.forEach(event => {
                        const eventElement = document.createElement('div');
                        eventElement.classList.add('event-card');
                        eventElement.innerHTML = `
                            <h3>${event.name}</h3>
                            <p><strong>Date:</strong> ${event.date}</p>
                            <p><strong>Time:</strong> ${event.time}</p>
                            <p><strong>Location:</strong> ${event.location}</p>
                            <p>${event.description}</p>
                            <button class="delete-event" data-id="${event.id}">Delete</button>
                        `;
                        eventContainer.appendChild(eventElement);
                    });
                    addDeleteEventListeners();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                eventContainer.innerHTML = 'Error loading events. Please try again.';
            });
    }

    // Function to add event listeners to delete buttons
    function addDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-event');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const eventId = this.getAttribute('data-id');
                deleteEvent(eventId);
            });
        });
    }

    // Function to delete an event
    function deleteEvent(eventId) {
        if (confirm('Are you sure you want to delete this event?')) {
            fetch('deleteEvent.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${eventId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Event deleted successfully');
                    fetchAndDisplayEvents();
                } else {
                    alert('Error deleting event');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error deleting event');
            });
        }
    }
});

