<script>
  import Button from "./Button.svelte";
  import NavButton from "./NavButton.svelte";

  export let index;
  export let pop;
</script>

<div class:backgroundColor={index%2!=0} class="container"> 
  <p>{pop.id}</p>
  <p>{pop.task?.goal}</p>
  <p>{pop.goals?.length}</p>
  <NavButton text='bekijk' lightBackground href='viewPop/{pop.id}' />
</div>

<style>
  p{
    font-size: 1.4em;
  }

  .container{
    display: grid;
    gap: 1rem;
    grid-template-columns:3em 100em 1fr 1fr;
    padding: 1em;
    border-radius: .5em;
    align-items: center;
  }

  .backgroundColor{
    background-color: rgb(216, 216, 216);
  }
</style>