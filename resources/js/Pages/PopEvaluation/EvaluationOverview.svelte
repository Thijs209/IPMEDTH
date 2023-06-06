<script lang="ts">
    import PopArchive from "./../../Components/EvaluatePopComponents/PopArchive.svelte";
    import PopCards from "./../../Components/EvaluatePopComponents/PopCards.svelte";
    import PopCard from "./../../Components/EvaluatePopComponents/PopCard.svelte";
    import CreatePageHeader from "./../../Components/CreatePageHeader.svelte";
    import Layout from "./../../Layouts/Layout.svelte";

    let pageHeading = "POP Overzicht";
    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];
    export let pops: Array<{
        name: string;
        startDate: string;
        endDate: string;
        status: number;
    }> = [
        {
            name: "John Thomas",
            startDate: "01-01-2023",
            endDate: "01-01-2024",
            status: 1,
        },
        {
            name: "Karin Tonneman",
            startDate: "01-01-2023",
            endDate: "01-06-2023",
            status: 2,
            popId: 1234,
            userId: 1,
        },
        {
            name: "Tom Mann",
            startDate: "01-01-2023",
            endDate: "01-05-2023",
            status: 3,
            popId: 1235,
            userId: 2,
        },
    ];
</script>

<Layout>
    <article slot="main" class="evaluation-dashboard">
        <CreatePageHeader {pages} currentPage={0} setCurrentPage={() => {}} />
        <div class="cards-container">
            <PopCards {pops} />
        </div>

        <div class="archive-container">
            <PopArchive />
        </div>
    </article>
</Layout>

<style>
    .evaluation-dashboard {
        font-size: 1.6rem;
        display: flex;
        flex-direction: column;
        align-items: start;
        justify-content: start;
        height: 100%;
        min-height: 100%;
        padding: 1rem;
    }

    .cards-container {
        min-height: 30vh;
        width: 100%;
    }

    .archive-container {
        display: flex;
        width: 100%;
        min-height: 50vh;
    }
</style>
