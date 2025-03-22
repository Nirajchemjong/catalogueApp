import { Card, CardContent, CardMedia, Container, Grid, Grid2, Typography } from '@mui/material';
import React from 'react';

type CatalogueItem = {
    id: number;
    fullname: string;
    summary?: string;
    imageurl?: string;
    summarytext?: string;
    clickEvent: string;
    layout: string;
};

interface Props {
    data: CatalogueItem[];
}

const Catalogue: React.FC<Props> = ({ data }) => {
    console.log('data is ', data);
    return (
        <Container>
            <Typography variant="h4" gutterBottom className="mt-2 text-center">
                Catalogue App | Acron
            </Typography>

            <Grid2 container spacing={3}>
                {data.map((item) => (
                    <Grid item xs={12} sm={6} md={4} key={item.id}>
                        <Card sx={{ height: '100%' }}>
                            {item.imageurl && <CardMedia component="img" height="140" image={item.imageurl} alt={item.fullname} />}
                            <CardContent>
                                <Typography variant="h6" component="div">
                                    {item.fullname}
                                </Typography>
                                {item.summary && (
                                    <Typography variant="body2" color="text.secondary" dangerouslySetInnerHTML={{ __html: item.summary }} />
                                )}
                            </CardContent>
                        </Card>
                    </Grid>
                ))}
            </Grid2>
        </Container>
    );
};

export default Catalogue;
