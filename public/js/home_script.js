function edit() {
    //Get all spans which all content will be replace by inputs
    var spans = document.getElementsByClassName("input");
    var index;
    var span;

    //Get button save/edit
    var buttonSave = document.getElementById("buttonSave");
    var buttonEdit = document.getElementById("buttonEdit");

    //Hide edit button and show save button
    buttonSave.removeAttribute("hidden");
    buttonEdit.setAttribute("hidden", "hidden");

    // for each element replace the content
    for (index = 0; index < spans.length; ++index) {
        span = spans[index];
        var text = span.innerHTML;
        var id = span.id;

        //if it's a country insert a list to choose a country
        if (span.classList.contains('country')) {
            var input = document.createElement("SELECT");
            var countries = ['Suisse', 'France', 'Allemagne'];
            //Insert all the countries that are in the array as option of the list
            countries.forEach(function (country) {
                var option = document.createElement("OPTION");
                option.setAttribute('value', country);
                if (country == text)
                    option.setAttribute('selected', "selected");
                option.innerText = country;
                input.appendChild(option);
            });

        } else { // if it's another element than country list, display an input
            var input = document.createElement("INPUT");
            input.setAttribute("type", "text");
            input.setAttribute("value", text);
        }

        input.setAttribute("id", "input_" + id);
        input.setAttribute("name", "input_" + id);

        //Empty the span and insert the input
        span.innerHTML = "";
        span.appendChild(input);
    }
}
