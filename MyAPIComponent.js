import React, { useState, useEffect } from 'react';

const MyApiComponent = () => {
  const [apiData, setApiData] = useState(null);

  useEffect(() => {
    // Fetch data from your GitHub-hosted backend endpoint
    fetch('https://timmymesak.github.io/csc226-2/connect_and_display.php')
      .then(response => response.json())
      .then(data => setApiData(data))
      .catch(error => console.error('Error fetching data:', error));
  }, []);

  return (
    <div>
      <h1>My API Component</h1>
      {apiData ? (
        <div>
          {/* Display relevant data from the API response */}
          <p>Data from API: {apiData.someKey}</p>
        </div>
      ) : (
        <p>Loading...</p>
      )}
    </div>
  );
};

export default MyApiComponent;
