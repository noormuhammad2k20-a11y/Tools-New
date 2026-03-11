/**
 * toolLogic.js - Pure Javascript implementations of tool processing functions.
 * No server-side dependencies.
 */

export const textLogic = {
  upperCase: (input) => input.toUpperCase(),
  lowerCase: (input) => input.toLowerCase(),
  titleCase: (input) => input.replace(/\w\S*/g, (txt) => txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase()),
  sentenceCase: (input) => input.toLowerCase().replace(/(^\s*\w|[\.\!\?]\s*\w)/g, (c) => c.toUpperCase()),
  wordCount: (input) => {
    const words = input.trim().split(/\s+/).filter(w => w.length > 0);
    const chars = input.length;
    const lines = input.split(/\n/).length;
    return `Words: ${words.length}\nCharacters: ${chars}\nLines: ${lines}`;
  },
  reverseText: (input) => input.split('').reverse().join(''),
  removeDuplicateLines: (input) => [...new Set(input.split('\n'))].join('\n'),
  slugify: (input) => input.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-'),
  truncate: (input) => input.length > 200 ? input.substring(0, 200) + "..." : input,
};

export const encoderLogic = {
  base64Encode: (input) => btoa(input),
  base64Decode: (input) => {
    try {
      return atob(input);
    } catch (e) {
      return "Error: Invalid Base64 input.";
    }
  },
  urlEncode: (input) => encodeURIComponent(input),
  urlDecode: (input) => decodeURIComponent(input),
};

export const webLogic = {
  cssMinify: (input) => input.replace(/\s+/g, ' ').replace(/\/\*.*?\*\//g, '').replace(/ ?\{ ?/g, '{').replace(/ ?\} ?/g, '}').replace(/ ?\: ?/g, ':').replace(/ ?\; ?/g, ';'),
  htmlMinify: (input) => input.replace(/\s+/g, ' ').replace(/>\s+</g, '><').replace(/<!--.*?-->/g, ''),
};

export const devLogic = {
  jsonFormat: (input) => {
    try {
      return JSON.stringify(JSON.parse(input), null, 2);
    } catch (e) {
      return `Error: Invalid JSON - ${e.message}`;
    }
  },
  jsonMinify: (input) => {
    try {
      return JSON.stringify(JSON.parse(input));
    } catch (e) {
      return `Error: Invalid JSON - ${e.message}`;
    }
  }
};
