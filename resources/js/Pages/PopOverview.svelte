<script>
    import CurrentPop from "../Components/CurrentPop.svelte";
  import PopRow from "../Components/PopRow.svelte";
  import Layout from "../Layouts/Layout.svelte"; 
  import { router, page } from '@inertiajs/svelte'
  export let pops;
  
  let currentPop = pops.find(pop => pop.user_finished == 0);
</script>

<Layout>
  <div class="container" slot="main">
    <CurrentPop pop={currentPop} />
    <div>
      <h1>Mijn POPs</h1>
      <div class="pop-overview">
        <div class="header">
          <p>Id</p>
          <p>Project</p>
          <p>Doelen</p>
        </div>
        {#each pops as pop, i}
        <PopRow pop={pop} index={i} />
        {/each}
      </div>
    </div>
  </div>
</Layout>

<style>
  .container{
    padding: 2em 3em;
  }

  .header{
    display: grid;
    grid-template-columns:3em 100em 5em 1fr;
    gap: 1rem;
    font-weight: 600;
    background-color: #0d403d;
    color: white;
    padding: 1em;
    border-radius: .5em;
  }

  p{
    font-size: 1.5em;
  }
</style>