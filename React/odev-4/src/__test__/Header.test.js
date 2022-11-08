import React from 'react';
import { render, screen } from '@testing-library/react';
import "@testing-library/jest-dom"

import Header from '../Header';


test('Başlık render edilmeli', () => {
    render(< Header />);
    const title = screen.getByText(/Emoji Search/i);
    expect(title).toBeInTheDocument();
});