import { createContext, useContext, useEffect, useState } from 'react'

const ThemeContext = createContext()

const ThemeProvider = ({ children }) => {
    const getCurrentTheme = () => window.matchMedia("(prefers-color-scheme:dark)").matches
    const [isDark, setIsDark] = useState(getCurrentTheme)

    const mqListener = (e) => {
        setIsDark(e.matches)
    }

    const toogleTheme = () => {
        setIsDark(dark => !dark)
    }

    useEffect(() => {
        const darkThemeMq = window.matchMedia("(prefers-color-scheme: dark)");
        darkThemeMq.addListener(mqListener);

        return () => darkThemeMq.removeListener(mqListener);
    }, [])

    const values = {
        isDark,
        setIsDark,
        toogleTheme,
    }

    console.log(isDark)
    return (
        <ThemeContext.Provider value={values}>{children}</ThemeContext.Provider>
    )
}

const useTheme = () => useContext(ThemeContext)
export { ThemeProvider, useTheme }