<template>
    <div>
        <el-form @submit.prevent="searchProperties"  :model="search" inline>
            <el-form-item>
                <el-input v-model="search.filter['name']" placeholder="Name"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['bedrooms']" placeholder="Bedrooms" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['bathrooms']" placeholder="Bathrooms" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['storeys']" placeholder="Storeys" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['garages']" placeholder="Garages" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['price']['price_min']" placeholder="Min Price" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-input v-model="search.filter['price']['price_max']" placeholder="Max Price" type="number"></el-input>
            </el-form-item>
            <el-form-item>
                <el-button type="primary" @click="searchProperties" :loading="loading">Search</el-button>
            </el-form-item>
        </el-form>

        <el-table v-if="properties.data.length" :data="properties.data" style="width: 100%">
            <el-table-column prop="name" label="Name"></el-table-column>
            <el-table-column prop="price" label="Price"></el-table-column>
            <el-table-column prop="bedrooms" label="Bedrooms"></el-table-column>
            <el-table-column prop="bathrooms" label="Bathrooms"></el-table-column>
            <el-table-column prop="storeys" label="Storeys"></el-table-column>
            <el-table-column prop="garages" label="Garages"></el-table-column>
        </el-table>

        <el-alert v-if="!loading && !properties.data.length" title="No results found" type="warning" show-icon></el-alert>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            search: {
                filter: {
                    name: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: '',
                    price: {
                        price_min: '',
                        price_max: '',
                    }
                },
            },
            properties: this.searchProperties(),
            loading: false,
        };
    },
    methods: {
        async searchProperties() {
            this.loading = true;
            try {
                const response = await axios.get('/api/properties', { params: this.search });
                this.properties = response.data;
            } catch (error) {
                console.error(error);
            } finally {
                this.loading = false;
            }
        }
    },
};
</script>

<style scoped>
</style>
