<template>
    <div class="max-w-6xl mx-auto pb-32">
        <div class="flex flex-col">
            <div class="h-32">
                <logo class="h-32 w-full object-contain"></logo>
            </div>
        </div>
        <h1 class="docu-title">Customer Dashboard</h1>
        <div class="docu-text">
            <a href="/" class="docu-link">Home</a>
        </div>
    </div>
</template>
<script>
import Logo from "@/js/Pages/Shared/Logo/Logo";
//
export default {
    name: "CustomerDashboard",
    //
    components: {
        Logo
    }
};
</script>
