<template>
    <div>
        <Prism>class CoffeeMaker {
    function __constructor(coffee) {
        this.coffee = coffee
    }

    function brew() {
        print('Enjoy your cup of ' + this.coffee)
    }
}

maker := CoffeeMaker('espresso')

maker.brew()</Prism>

        <pre class="relative mx-auto bg-gray-800 text-gray-200 p-6 rounded shadow">>>> Enjoy your cup of espresso</pre>
    </div>
</template>

<script>
    export default {}
</script>
