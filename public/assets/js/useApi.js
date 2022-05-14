const usingApi = {
    loadTaskFromApi: function(){
        const fetchOptions = {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        };

        const taskApi = fetch('url of api', fetchOptions)

        taskApi.then(
            function(response) {
                return response.json();
            }
        )
        .then(
            function(jsonResponse)
            {
                console.log(jsonResponse);
            }
        )

   }
}
