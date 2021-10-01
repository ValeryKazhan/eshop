<div class="sorting">
    <select style="display: none;">
        <option value="1">Default sorting</option>
        <option value="1">Default sorting</option>
        <option value="1">Default sorting</option>
    </select><div class="nice-select" tabindex="0"><span class="current">Default sorting</span><ul class="list"><li data-value="1" class="option selected">Default sorting</li><li data-value="1" class="option">Default sorting</li><li data-value="1" class="option">Default sorting</li></ul></div>
</div>
<div class="sorting mr-auto">
    <select
        id="perPage"
        name="perPage"
        style="display: none;">
        <option value="6">Show 6</option>
        <option value="9">Show 9</option>
        <option id="perPage3" value="12">Show 12</option>
    </select>
{{--    <div class="nice-select" tabindex="0">--}}
{{--        <span class="current">Show 12</span>--}}
{{--        <ul class="list">--}}
{{--            <li data-value="1" class="option selected">Show 6</li>--}}
{{--            <li data-value="1" class="option">Show 9</li>--}}
{{--            <li data-value="1" class="option">Show 12</li>--}}
{{--        </ul>--}}
{{--    </div>--}}
</div>
<div>
    <button id="test-button" class="btn btn-primary">Press</button>
</div>

<script>
    document.getElementById('perPage3').addEventListener('click', showPage);

    function showPage(){
        console.log('vlalvavla');
    }
</script>

<script>
    let testButton = document.getElementById('test-button');
    testButton.addEventListener('click', showText);
    testButton.addEventListener('click', showxhr);


    function showxhr(){
        let xhr = new XMLHttpRequest();
        console.log(xhr);
    }
    function showText()
    {
        console.log('button clicked');
    }
</script>
