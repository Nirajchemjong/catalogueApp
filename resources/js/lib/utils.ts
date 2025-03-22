import { type ClassValue, clsx } from 'clsx';
import { twMerge } from 'tailwind-merge';

export function cn(...inputs: ClassValue[]) {
    return twMerge(clsx(inputs));
}

export const getColorByContentType = (type: string): string => {
    switch (type) {
        case 'Live Learning':
            return '#1976d2'; // Blue for Live Learning
        case 'Program':
            return '#9c27b0'; // Purple for Program
        case 'Course':
        default:
            return '#2e7d32'; // Green for Course or default
    }
};

export const getHoverColorByContentType = (type: string): string => {
    switch (type) {
        case 'Live Learning':
            return '#1565c0';
        case 'Program':
            return '#7b1fa2';
        case 'Course':
        default:
            return '#1b5e20';
    }
};

export const handleClickEvent = (type: string, title: string): void => {
    switch (type) {
        case 'alert':
            alert(`Clicked: ${title}`);
            break;
        case 'success':
            alert(`✅ Success: ${title}`);
            break;
        case 'warning':
            alert(`⚠️ Warning: ${title}`);
            break;
        default:
            alert('No click event specified');
    }
};
