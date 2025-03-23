import { getColorByContentType, getHoverColorByContentType, getShapeStyles } from '@/lib/utils';
import { Box, Button, Card, CardContent, CardMedia, FormLabel, Typography } from '@mui/material';
import React from 'react';

export type CatalogueItem = {
    id: number;
    fullname: string;
    summary?: string;
    summarytext?: string;
    imageurl?: string;
    clickEvent: string;
    layout: string;
    contentType: string;
    contentstatus: string;
};

interface Props {
    item: CatalogueItem;
}

const CatalogueCard: React.FC<Props> = ({ item }) => {
    const handleClick = () => {
        switch (item.clickEvent) {
            case 'alert':
                alert(`Clicked: ${item.fullname}`);
                break;
            case 'success':
                alert(`✅ Success: ${item.fullname}`);
                break;
            case 'warning':
                alert(`⚠️ Warning: ${item.fullname}`);
                break;
            default:
                alert('No click event specified');
        }
    };

    const baseColor = getColorByContentType(item.contentType);

    return (
        <Card
            onClick={handleClick}
            sx={{
                ...getShapeStyles(item?.layout),
                height: '100%',
                cursor: 'pointer',
                borderLeft: `5px solid ${baseColor}`,
                boxShadow: 2,
                '&:hover': {
                    transform: 'scale(1.02)',
                    transition: '0.2s ease',
                },
            }}
        >
            {item.imageurl ? (
                <CardMedia component="img" height="140" image={item.imageurl} alt={item.fullname} />
            ) : (
                <Box
                    sx={{
                        height: 140,
                        backgroundColor: '#f0f0f0',
                        display: 'flex',
                        alignItems: 'center',
                        justifyContent: 'center',
                        color: '#999',
                        fontSize: '14px',
                    }}
                >
                    No Image
                </Box>
            )}
            <CardContent>
                <Box sx={{ display: 'flex', alignItems: 'center' }}>
                    <Typography variant="h6" component="div" color={item.contentType === 'Live Learning' ? 'primary' : 'text.primary'}>
                        {item.fullname}
                    </Typography>
                    <Button
                        variant="contained"
                        sx={{
                            backgroundColor: baseColor,
                            color: '#fff',
                            '&:hover': {
                                backgroundColor: getHoverColorByContentType(item.contentType),
                            },
                            ml: 2,
                        }}
                    >
                        {item.contentType}
                    </Button>
                </Box>
                <Typography
                    variant="body2"
                    color="text.primary"
                    sx={{ mt: 1 }}
                    dangerouslySetInnerHTML={{
                        __html: item.summary || 'No Summary available.',
                    }}
                    className="h-20 overflow-y-auto text-wrap"
                />
                <Typography variant="body2" color="text.secondary" sx={{ mt: 1 }} className="h-40 overflow-y-auto text-wrap">
                    {item.summarytext || 'No Summary Text available.'}
                </Typography>
                <FormLabel>Status: {item.contentstatus}</FormLabel>
            </CardContent>
        </Card>
    );
};

export default CatalogueCard;
