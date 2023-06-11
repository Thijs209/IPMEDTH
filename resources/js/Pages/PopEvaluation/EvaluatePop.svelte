<script lang="ts">
	import EvaluatePopLayout from './../../Layouts/EvaluatePopLayout.svelte';
	import CreatePageHeader from './../../Components/CreatePageHeader.svelte';
    import { page } from "@inertiajs/svelte";
    let pages: string[] = ["Home", "POP Overzicht", "POP Review"];

    console.log($page.props);
</script>

<CreatePageHeader {pages} currentPage={0} setCurrentPage={() => {}} />
<EvaluatePopLayout />

<style>
</style>
