// resources/js/pages/Catalogue.tsx

import CatalogueCard, { CatalogueItem } from '@/components/catalogueCard';
import { CatalogueLayout } from '@/layouts/catalogue/catalogueLayout';
import { Grid } from '@mui/material';
import React from 'react';

interface Props {
    data: CatalogueItem[];
}

const Catalogue: React.FC<Props> = ({ data }) => {
    return (
        <CatalogueLayout title="Catalogue App | Acorn">
            <Grid container spacing={3}>
                {data.map((item, index) => (
                    <Grid item xs={12} sm={6} md={4} key={`${item.fullname}-${index}`}>
                        <CatalogueCard item={item} />
                    </Grid>
                ))}
            </Grid>
        </CatalogueLayout>
    );
};

export default Catalogue;
