// resources/js/layouts/catalogue/CatalogueLayout.tsx

import { Box, Container, Typography } from '@mui/material';
import React, { ReactNode } from 'react';

interface Props {
    title: string;
    children: ReactNode;
}

export const CatalogueLayout: React.FC<Props> = ({ title, children }) => {
    return (
        <Box>
            <Box sx={{ backgroundColor: '#1976d2', py: 2, color: 'white' }}>
                <Container>
                    <Typography variant="h5">{title}</Typography>
                </Container>
            </Box>
            <Container sx={{ py: 4 }}>{children}</Container>
        </Box>
    );
};
