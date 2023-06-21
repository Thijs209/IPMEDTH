<script lang="ts">
    let tableHeaders = [
        "Afgesloten op",
        "Naam",
        "People Manager",
        "Status",
        "Doelen behaald",
    ];

    interface Pop {
        userFinishedAt: string;
        user: {
            displayName: string;
        };
    }

    export let finishedPops: Pop[] = [];
    let tableRows = [
        ["01-01-2021", "Tom Mann", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
        // ["01-01-2021", "Vera Dide van Oene", "Afgesloten", "Ja"],
    ];
    finishedPops.forEach((finishedPop) => {
        let tableRow = [
            finishedPop.userFinishedAt,
            finishedPop.user.displayName,
            "Vera PM",
            "Afgesloten",
            "Ja",
        ];
        tableRows.push(tableRow);
    });
</script>

<div class="container">
    <h3 class="heading">Archief</h3>
    <table>
        <thead>
            {#each tableHeaders as header}
                <th class="table__column-header">{header}</th>
            {/each}
        </thead>
        <tbody>
            {#each tableRows as tableRow}
                <tr>
                    {#each tableRow as column}
                        <td>{column}</td>
                    {/each}
                </tr>
            {/each}
        </tbody>
    </table>
</div>

<style>
    .container {
        width: 100%;
        height: 100%;
        align-self: end;
    }

    .heading {
        display: flex;
        justify-content: start;
        align-items: start;
        height: 4rem;
        width: 100%;
        font-weight: 600;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    table {
        height: 100%;
        width: 100%;
        border-collapse: collapse;
    }

    caption {
        display: flex;
        width: 100%;
        font-weight: 600;
        font-size: 1rem;
    }

    th {
        text-align: left;
        padding: 0.5rem;
        font-weight: 600;
    }

    tr {
        background-color: #e6e6e6;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
