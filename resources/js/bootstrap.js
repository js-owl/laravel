(async function () {
    let res = await fetch(`${window.appData.apiRoot}/todos`, {
        headers: {
            Accept: "application/json",
        },
    });
    let data = await res.json();
    console.log(data);
})();
