const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const fileCode = urlParams.get('code');

const apiUrl = `https://netu.tv/api/file/embed?key=317aab3a8f635b74aac80d6a1d4dd715&file_code=${encodeURIComponent(fileCode)}`;

fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    // Handle the fetched data as needed
    console.log('Fetched data:', data);
  })
  .catch(error => {
    console.error('Error:', error);
  });
  
