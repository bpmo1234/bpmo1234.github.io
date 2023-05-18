fetch("https://doodapi.com/api/file/list?key=224922u6vnvqmphh06jg9f")
  .then(response => response.json())
  .then(data => {
    const response = {
        "result": {
          "results_total": 1,
          "results": 1,
          "total_pages": 1,
          "files": [
            {
              "single_img": "https://img.doodcdn.co/snaps/kdry32hx6mp1rtcy.jpg",
              "download_url": "https://dooood.com/d/mj6spxsv5107",
              "uploaded": "2023-04-20 14:53:57",
              "file_code": "mj6spxsv5107",
              "length": 11571,
              "views": 0,
              "title": "1681211768sz13l",
              "public": 1,
              "canplay": 1,
              "fld_id": 0
            }
          ]
        },
        "server_time": "2023-05-18 17:18:50",
        "msg": "OK",
        "status": 200
      };
      
      const file = response.result.files[0];
      const singleImg = file.single_img;
      const title = file.title;
      const downloadUrl = file.download_url;
      
      console.log("Single Image URL:", singleImg);
      console.log("Title:", title);
      console.log("Download URL:", downloadUrl);
      
    console.log(data);
  })
  .catch(error => {
    // Handle any errors
    console.error("Error fetching data:", error);
  });
