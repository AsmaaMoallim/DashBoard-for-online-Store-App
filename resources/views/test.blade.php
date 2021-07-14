<!doctype html>

<html lang="en">
<head>
    <title>Fancy Dropdown</title>
    <link rel="stylesheet" href="fancy_dropdown.css?v=1.0">
    <script src="fancy_dropdown.js"></script>
</head>

<body>


<img src="https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk02n8S-cImHfxgef7xpqQh8RnaKQ5w:1626279050249&tbm=isch&source=iu&ictx=1&fir=2DNOEjVi-CBaYM%252CAOz9-XMe1ixZJM%252C_&vet=1&usg=AI4_-kTdHq7xJp3YrXSxF61zau2vMj8IrA&sa=X&ved=2ahUKEwiRw-HI-eLxAhVBt6QKHdQWAOUQ9QF6BAgHEAE#imgrc=2DNOEjVi-CBaYM">

<img src="public/svg/editlcon.svg" alt="image">
<img src="test_database\public\svg\editlcon.svg" alt="image">

{{--<div class="dropdown">--}}
{{--    <input type="text" id="car-type" value="choose your car type" class="field"--}}

{{--           readonly="readonly" onmouseover="showElement('menu-id', true);" />--}}
{{--    <ul class="list" id="menu-id" onmouseleave="showElement('menu-id', false)">--}}
{{--        <li onclick="setValue('car-type', 'sedan'); showElement('menu-id', false);">--}}
{{--            <img src="https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk018S2iSWGJobLLo3rLvtkz4JZBNaA:1625683672504&tbm=isch&source=iu&ictx=1&fir=sp12V8x9gw6KuM%252C4O2GvGuD-Cf09M%252C_&vet=1&usg=AI4_-kQEhwvv8XVOUM-Brg35qlp5X-Ofxw&sa=X&ved=2ahUKEwii38POz9HxAhX2gP0HHbxkB9UQ9QF6BAgNEAE#imgrc=sp12V8x9gw6KuM" style="max-width: 130px;">Sedan</li>--}}
{{--        <li onclick="setValue('car-type', 'suv'); showElement('menu-id', false);">--}}
{{--            <img src="https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk018S2iSWGJobLLo3rLvtkz4JZBNaA:1625683672504&tbm=isch&source=iu&ictx=1&fir=sp12V8x9gw6KuM%252C4O2GvGuD-Cf09M%252C_&vet=1&usg=AI4_-kQEhwvv8XVOUM-Brg35qlp5X-Ofxw&sa=X&ved=2ahUKEwii38POz9HxAhX2gP0HHbxkB9UQ9QF6BAgNEAE#imgrc=sp12V8x9gw6KuM" style="max-width: 130px;">SUV</li>--}}
{{--        <li onclick="setValue('car-type', 'hatchback'); showElement('menu-id', false);">--}}
{{--            <img src="https://www.google.com.sa/search?q=image&hl=ar&sxsrf=ALeKk018S2iSWGJobLLo3rLvtkz4JZBNaA:1625683672504&tbm=isch&source=iu&ictx=1&fir=sp12V8x9gw6KuM%252C4O2GvGuD-Cf09M%252C_&vet=1&usg=AI4_-kQEhwvv8XVOUM-Brg35qlp5X-Ofxw&sa=X&ved=2ahUKEwii38POz9HxAhX2gP0HHbxkB9UQ9QF6BAgNEAE#imgrc=sp12V8x9gw6KuM" style="max-width: 130px;">Hatchback</li>--}}
{{--    </ul>--}}
{{--</div>--}}

<script>
    /**
     * Show or hide the element with the matching id.
     * @param {string} divId The id of the element to show/hide.
     * @param {boolean} show True to show, false to hide.
     */
    function showElement(divId, show) {
        document.getElementById(divId).style.display = (show) ? "inline" : "none";
    }

    /**
     * Set the value of the element with the matching id.
     * @param {string} divId The id of the element to change.
     * @param {string} value Value to set.
     */
    function setValue(divId, value) {
        document.getElementById(divId).value = value;
    }

</script>

</body>
</html>


