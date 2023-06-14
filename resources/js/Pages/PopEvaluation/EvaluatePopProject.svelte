<script lang="ts">
    import PopProjectField from "../../Components/EvaluatePopComponents/PopProjectField.svelte";

    export let popProject: { [key: string]: { [key: string]: string } };
    let flattenedArray: Array<string[]> = [];
    // Onderstaande code maakt van het object een array met arrays van de values van de objecten
    Object.entries(popProject).map((projectItem) => {
        Object.values(projectItem).map((item) => {
            if (typeof item === "object") {
                flattenedArray.push(Object.values(item));
            }
        });
    });
</script>

<section>
    {#each flattenedArray as projectItem}
        <PopProjectField question={projectItem[0]} answer={projectItem[1]} />
    {/each}
</section>

<style>
    section {
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: start;
        width: 100%;
        height: 100%;
        gap: 1rem;
    }
    .pop-project {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }
</style>
