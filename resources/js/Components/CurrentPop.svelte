<script>
  import Button from "./Button.svelte";
  import { router, page } from '@inertiajs/svelte'

  export let pop;
  export let user;

  function setFinished() {
    router.post(`pop-finished/${pop.id}`)
  }

  console.log(pop);
</script>

<div class="container">
  <h1>Hallo {user.first_name}</h1>
  {#if pop != undefined}
  <h4>Huidige POP: {pop.task.goal}</h4>
  <div class="row">
    <p>people manager:</p>
    <p>{pop.evaluatedBy||'onbekend'}</p>
  </div>
  <div class="row">
    <p>Doelen:</p>
    <p>{pop.goals.length}</p>
  </div>
  <div class="bottomRow">
    <a href="/create-pop/{pop.id}">
      <Button text='bekijk' marginTop />
    </a>
    <div class="checkbox">
      <h3>finished:</h3>
      <input on:click={() => setFinished()} type="checkbox">
    </div>
  </div>
  {:else}
  <h1>Je hebt op dit moment geen lopende POP</h1>
  <a href="/create-pop">
    <Button marginTop text='Maak Nieuwe POP' />
  </a>
  {/if} 
</div>

<style>
  .container{
    width:100%;
    padding: 2em 3em;
    background-color: #0d403d;
    border-radius: 1em;
    color: white;
    margin-bottom: 1em;
  }

  .bottomRow{
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .checkbox{
    display: flex;
    gap: 1em;
    align-items: center;
  }

  input{
    width: 2em;
    height: 2em;
  }

  .row{
    display: grid;
    grid-template-columns: 20em 30em;
  }

  h4{
    font-size: 2em;
    margin-top: 1em;
  }

  p{
    font-size: 1.5em;
  }
</style>