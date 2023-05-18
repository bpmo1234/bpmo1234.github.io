const express = require('express');
const fetch = require('node-fetch');

const app = express();
const PORT = 3000;

app.get('/api/file/list', async (req, res) => {
  const url = 'https://doodapi.com/api/file/list?key=224922u6vnvqmphh06jg9f';

  try {
    const response = await fetch(url);
    const data = await response.json();

    res.json(data);
  } catch (error) {
    res.status(500).json({ error: 'An error occurred' });
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
