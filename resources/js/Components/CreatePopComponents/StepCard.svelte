<script>
    export let step;
    console.log(typeof step);
</script>

<div class="container">
    <u>Stap {step.id}</u>
    <p>{step.value}</p>
</div>

<style>
    u{
        font-size: 1.8em;
        font-weight: 700;
        color: white;
    }

    p{
        font-size:1.5em;
    }
    .container{
        padding: 1em 2em;
        background-color: #0d403d;
        border-radius: .5em;
        box-shadow: black 0px 0px 10px 0px;
        max-width: 30em;
    }
</style>